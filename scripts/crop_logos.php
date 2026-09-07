<?php
/**
 * Auto-crop whitespace from all logo images in assets/images/clients/
 */
$dir = __DIR__ . '/../assets/images/clients';
$files = scandir($dir);

foreach ($files as $file) {
    if ($file === '.' || $file === '..') continue;
    $filePath = "$dir/$file";
    $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

    if (!in_array($ext, ['png', 'jpg', 'jpeg'])) continue;

    echo "Processing $file...\n";

    if ($ext === 'png') {
        $img = imagecreatefrompng($filePath);
    } else {
        $img = imagecreatefromjpeg($filePath);
    }

    if (!$img) {
        echo "Failed to load $file\n";
        continue;
    }

    $width = imagesx($img);
    $height = imagesy($img);

    // Sample corner pixels to determine background color
    $cornerColors = [];
    $corners = [[0, 0], [$width - 1, 0], [0, $height - 1], [$width - 1, $height - 1]];
    foreach ($corners as $c) {
        $rgb = imagecolorat($img, $c[0], $c[1]);
        $colors = imagecolorsforindex($img, $rgb);
        $cornerColors[] = $colors;
    }

    // Determine if background is transparent or near-white / solid
    $bgR = $cornerColors[0]['red'];
    $bgG = $cornerColors[0]['green'];
    $bgB = $cornerColors[0]['blue'];
    $bgA = $cornerColors[0]['alpha'];

    $minX = $width;
    $minY = $height;
    $maxX = 0;
    $maxY = 0;

    for ($y = 0; $y < $height; $y++) {
        for ($x = 0; $x < $width; $x++) {
            $rgb = imagecolorat($img, $x, $y);
            $c = imagecolorsforindex($img, $rgb);

            $isBg = false;
            if ($bgA > 100 && $c['alpha'] > 100) {
                $isBg = true;
            } elseif ($c['alpha'] > 120) {
                $isBg = true; // transparent
            } else {
                // If background is white/near-white or near the corner color
                $diff = abs($c['red'] - $bgR) + abs($c['green'] - $bgG) + abs($c['blue'] - $bgB);
                if ($diff < 25 && ($bgR > 220 || $bgG > 220 || $bgB > 220)) {
                    $isBg = true;
                } elseif ($c['red'] > 245 && $c['green'] > 245 && $c['blue'] > 245) {
                    $isBg = true; // almost pure white
                }
            }

            if (!$isBg) {
                if ($x < $minX) $minX = $x;
                if ($x > $maxX) $maxX = $x;
                if ($y < $minY) $minY = $y;
                if ($y > $maxY) $maxY = $y;
            }
        }
    }

    if ($maxX >= $minX && $maxY >= $minY) {
        $pad = 10;
        $minX = max(0, $minX - $pad);
        $minY = max(0, $minY - $pad);
        $maxX = min($width - 1, $maxX + $pad);
        $maxY = min($height - 1, $maxY + $pad);

        $cropW = $maxX - $minX + 1;
        $cropH = $maxY - $minY + 1;

        echo "  Cropping $file: original {$width}x{$height} -> cropped {$cropW}x{$cropH} (bounds: $minX, $minY to $maxX, $maxY)\n";

        $cropped = imagecreatetruecolor($cropW, $cropH);
        
        if ($ext === 'png') {
            imagealphablending($cropped, false);
            imagesavealpha($cropped, true);
            $transparent = imagecolorallocatealpha($cropped, 255, 255, 255, 127);
            imagefilledrectangle($cropped, 0, 0, $cropW, $cropH, $transparent);
        } else {
            $white = imagecolorallocate($cropped, 255, 255, 255);
            imagefilledrectangle($cropped, 0, 0, $cropW, $cropH, $white);
        }

        imagecopy($cropped, $img, 0, 0, $minX, $minY, $cropW, $cropH);

        if ($ext === 'png') {
            imagepng($cropped, $filePath, 9);
        } else {
            imagejpeg($cropped, $filePath, 95);
        }
        imagedestroy($cropped);
    } else {
        echo "  No crop needed or bounds not found for $file\n";
    }

    imagedestroy($img);
}

echo "All logos cropped successfully!\n";
