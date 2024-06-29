import { Component, Input } from '@angular/core';
import { IAccomodationsItem } from '../../accommodation.type';

@Component({
  selector: 'accomodations-item',
  standalone: true,
  imports: [],
  templateUrl: './item.component.html',
})
export class AccomodationsItemComponent {
  @Input() accommodation!: IAccomodationsItem;
}
