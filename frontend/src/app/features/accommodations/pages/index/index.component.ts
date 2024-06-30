import { Component } from '@angular/core';
import { AccomodationsListComponent } from '../../components/list/list.component';
import { AccomodationsFilterComponent } from '../../components/filter/filter.component';
import { NgbNavModule } from '@ng-bootstrap/ng-bootstrap';
import { AccomodationsExportComponent } from '../../components/export/export.component';

@Component({
  selector: 'accommodations-index',
  standalone: true,
  imports: [
    AccomodationsListComponent,
    AccomodationsFilterComponent,
    AccomodationsExportComponent,
    NgbNavModule
  ],
  templateUrl: './index.component.html',
})
export class AccommodationsIndexPage {

  public query: string = '';


  public updateQuery(query: string) {
    this.query = query;
  }
}
