import { Component } from '@angular/core';
import { AccomodationsListComponent } from '../../components/list/list.component';

@Component({
  selector: 'accommodations-index',
  standalone: true,
  imports: [AccomodationsListComponent],
  templateUrl: './index.component.html',
})
export class AccommodationsIndexPage {

}
