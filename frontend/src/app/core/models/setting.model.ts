export interface SiteSettings {
  site: {
    name?: string;
    email?: string;
    phone?: string;
    address?: string;
    logo?: string | null;
    favicon?: string | null;
  };
  social: {
    facebook?: string;
    instagram?: string;
    youtube?: string;
    linkedin?: string;
    twitter?: string;
  };
  seo: {
    meta_title?: string;
    meta_description?: string;
    meta_keywords?: string;
  };
  homepage?: {
    hero?: {
      title?: string;
      subtitle?: string;
      image?: string | null;
    };
    about?: {
      title?: string;
      description?: string;
      image?: string | null;
    };
    why_choose_us?: {
      title?: string;
      description?: string;
    };
    contact_section?: {
      title?: string;
      description?: string;
    };
  };
}