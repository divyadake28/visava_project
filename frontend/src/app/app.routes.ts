import { Routes } from '@angular/router';
import { HomeComponent } from './pages/home/home.component';
import { AboutComponent } from './pages/about/about.component';
import { ExperiencesComponent } from './pages/experiences/experiences.component';
import { PackagesComponent } from './pages/packages/packages.component';
import { PackageDetailsComponent } from './pages/package-details/package-details.component';
import { EventsComponent } from './pages/events/events.component';
import { EventDetailsComponent } from './pages/event-details/event-details.component';
import { BlogsComponent } from './pages/blogs/blogs.component';
import { BlogDetailsComponent } from './pages/blog-details/blog-details.component';
import { GalleryComponent } from './pages/gallery/gallery.component';
import { FaqComponent } from './pages/faq/faq.component';
import { ContactComponent } from './pages/contact/contact.component';
import { NotFoundComponent } from './pages/not-found/not-found.component';

export const routes: Routes = [
  { path: '', component: HomeComponent, title: 'Visawa Agro Tourism – Babacha Mala' },
  { path: 'about', component: AboutComponent, title: 'About Us - Visawa Agro Tourism' },
  { path: 'experiences', component: ExperiencesComponent, title: 'Experiences & Activities - Visawa Agro Tourism' },
  { path: 'packages', component: PackagesComponent, title: 'Agro Packages - Visawa Agro Tourism' },
  { path: 'packages/:slug', component: PackageDetailsComponent, title: 'Package Details - Visawa Agro Tourism' },
  { path: 'events', component: EventsComponent, title: 'Events & Celebrations - Visawa Agro Tourism' },
  { path: 'events/:slug', component: EventDetailsComponent, title: 'Event Details - Visawa Agro Tourism' },
  { path: 'blogs', component: BlogsComponent, title: 'Agro Blog & Stories - Visawa Agro Tourism' },
  { path: 'blogs/:slug', component: BlogDetailsComponent, title: 'Blog Details - Visawa Agro Tourism' },
  { path: 'gallery', component: GalleryComponent, title: 'Farm Photo Gallery - Visawa Agro Tourism' },
  { path: 'faq', component: FaqComponent, title: 'FAQs - Visawa Agro Tourism' },
  { path: 'contact', component: ContactComponent, title: 'Contact & Reservations - Visawa Agro Tourism' },
  { path: '**', component: NotFoundComponent, title: 'Page Not Found - Visawa Agro Tourism' }
];