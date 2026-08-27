export interface Blog {
  id: number;
  title: string;
  title_mr?: string;
  title_en?: string;
  slug: string;
  short_description?: string;
  short_description_mr?: string;
  short_description_en?: string;
  description: string;
  description_mr?: string;
  description_en?: string;
  featured_image?: string | null;
  status: string;
  created_at?: string;
}