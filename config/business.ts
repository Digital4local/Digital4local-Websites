/**
 * Digital4Local - Central Business Configuration (TypeScript Definition)
 * Single Source of Truth for NAP (Name, Address, Phone), Author Profiles, Socials, and Location Clusters.
 */

export interface BusinessNAP {
  name: string;
  legalName: string;
  url: string;
  logoUrl: string;
  email: string;
  phone: string;
  phoneFormatted: string;
  whatsapp: string;
  whatsappFormatted: string;
  address: {
    streetAddress: string;
    addressLocality: string;
    addressRegion: string;
    postalCode: string;
    addressCountry: string;
  };
  geo: {
    latitude: number;
    longitude: number;
  };
  openingHours: string[];
  priceRange: string;
}

export interface AuthorProfile {
  name: string;
  role: string;
  photoUrl: string;
  bio: string;
  linkedin: string;
  twitter?: string;
  sameAs: string[];
}

export interface LocationClusterItem {
  slug: string;
  url: string;
  title: string;
  shortTitle: string;
  isHub: boolean;
  icon: string;
  tagline: string;
  primaryBenefit: string;
  tags: string[];
}

export interface LocationClusterCity {
  city: string;
  state: string;
  country: string;
  hubSlug: string;
  pages: LocationClusterItem[];
}

export const BUSINESS_CONFIG: {
  nap: BusinessNAP;
  author: AuthorProfile;
  socials: Record<string, string>;
  clusters: Record<string, LocationClusterCity>;
} = {
  nap: {
    name: "Digital4Local",
    legalName: "Digital4Local AI Growth & Local Search Marketing Agency",
    url: "https://digital4local.com",
    logoUrl: "https://digital4local.com/assets/images/digital4local_logo.png",
    email: "contact@digital4local.com",
    phone: "+919131140530",
    phoneFormatted: "+91 91311 40530",
    whatsapp: "+919131140530",
    whatsappFormatted: "+91 91311 40530",
    address: {
      streetAddress: "H.N 90 Priyadarshani Co Operative Society, Sant Aasharam Nagar, Bagmugaliya",
      addressLocality: "Bhopal",
      addressRegion: "Madhya Pradesh",
      postalCode: "462043",
      addressCountry: "IN"
    },
    geo: {
      latitude: 23.1908003,
      longitude: 77.464107
    },
    openingHours: ["Mo-Sa 09:00-19:00"],
    priceRange: "₹₹₹"
  },
  author: {
    name: "Abhishek Raikwar",
    role: "Founder & Lead AI Growth Strategist",
    photoUrl: "/assets/images/abhishek-raikwar.jpg",
    bio: "Abhishek Raikwar is the founder of Digital4Local. He specializes in local search engineering, Generative Engine Optimization (GEO/AEO), and building autonomous AI lead engines for businesses in Bhopal and worldwide.",
    linkedin: "https://www.linkedin.com/in/abhishek-raikwar-seo/",
    sameAs: [
      "https://www.linkedin.com/in/abhishek-raikwar-seo/",
      "https://digital4local.com/about.php"
    ]
  },
  socials: {
    linkedin: "https://www.linkedin.com/company/digital4local",
    instagram: "https://www.instagram.com/_digital4local",
    twitter: "https://twitter.com/digital4local",
    github: "https://github.com/digital4local",
    googleMaps: "https://maps.google.com/maps?q=Digital4local%20Bhopal"
  },
  clusters: {
    bhopal: {
      city: "Bhopal",
      state: "Madhya Pradesh",
      country: "India",
      hubSlug: "seo-agency-bhopal",
      pages: [
        {
          slug: "seo-agency-bhopal",
          url: "/seo-agency-bhopal/",
          title: "SEO Agency in Bhopal",
          shortTitle: "SEO Agency Bhopal (Hub)",
          isHub: true,
          icon: "search",
          tagline: "Full-Funnel Organic & AI Search Growth",
          primaryBenefit: "Comprehensive organic search dominance across Google Search, Maps, and AI answer engines.",
          tags: ["local-seo", "ai-search", "digital-marketing"]
        },
        {
          slug: "local-seo-bhopal",
          url: "/local-seo-bhopal/",
          title: "Local SEO Services in Bhopal",
          shortTitle: "Local SEO Bhopal",
          isHub: false,
          icon: "map-pin",
          tagline: "High-Intent Near Me & Map Rankings",
          primaryBenefit: "Capture local buyers searching for your services across Bhopal's key pin codes and commercial zones.",
          tags: ["local-seo", "google-business-profile"]
        },
        {
          slug: "google-business-profile-optimization-bhopal",
          url: "/google-business-profile-optimization-bhopal/",
          title: "Google Business Profile Optimization Bhopal",
          shortTitle: "GBP Optimization",
          isHub: false,
          icon: "store",
          tagline: "Google 3-Pack & Map Dominance",
          primaryBenefit: "Rank #1 in the Google Maps 3-Pack and convert nearby searchers into phone calls and walk-ins.",
          tags: ["google-business-profile", "local-seo"]
        },
        {
          slug: "ai-seo-bhopal",
          url: "/ai-seo-bhopal/",
          title: "AI SEO & GEO Services in Bhopal",
          shortTitle: "AI SEO & GEO",
          isHub: false,
          icon: "sparkles",
          tagline: "ChatGPT, Perplexity & Gemini Citations",
          primaryBenefit: "Structure your business knowledge graph so AI models recommend your brand first for buyer queries.",
          tags: ["ai-search", "local-seo"]
        },
        {
          slug: "digital-marketing-agency-bhopal",
          url: "/digital-marketing-agency-bhopal/",
          title: "Digital Marketing Agency in Bhopal",
          shortTitle: "Digital Marketing",
          isHub: false,
          icon: "megaphone",
          tagline: "Revenue-Driven Growth & Paid Ads",
          primaryBenefit: "Performance marketing, meta ads, and content engines that drive measurable inbound enquiries.",
          tags: ["digital-marketing", "ai-automation"]
        },
        {
          slug: "ai-agency-bhopal",
          url: "/ai-agency-bhopal/",
          title: "AI Agency & Automation in Bhopal",
          shortTitle: "AI Agency & Automation",
          isHub: false,
          icon: "bot",
          tagline: "AI Agents & Sub-60s Lead Workflows",
          primaryBenefit: "Deploy autonomous AI agents, n8n automations, and CRM integrations to close leads in under 60 seconds.",
          tags: ["ai-automation", "ai-search"]
        }
      ]
    }
  }
};
