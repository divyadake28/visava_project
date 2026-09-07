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
  blog_video?: string | null;
  video_thumbnail?: string | null;
  youtube_url?: string | null;
  youtube_id?: string | null;
  instagram_url?: string | null;
  has_media?: {
    image?: boolean;
    video?: boolean;
    youtube?: boolean;
    instagram?: boolean;
  };
  status: string;
  created_at?: string;
}