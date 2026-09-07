import { Component, inject, signal, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { LanguageService } from '../../core/services/language.service';
import { SettingService } from '../../core/services/setting.service';
import { SiteSettings } from '../../core/models/setting.model';

@Component({
  selector: 'app-about',
  standalone: true,
  imports: [CommonModule, RouterModule],
  templateUrl: './about.component.html'
})
export class AboutComponent implements OnInit {
  langService = inject(LanguageService);
  private settingService = inject(SettingService);

  settings = signal<SiteSettings | null>(null);

  ngOnInit() {
    this.settingService.getSettings().subscribe({
      next: (res) => {
        if (res.success && res.data) {
          this.settings.set(res.data);
        }
      },
      error: () => {}
    });
  }
}
