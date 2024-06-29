import { Component, OnInit, inject } from '@angular/core';
import { NgbPaginationModule } from '@ng-bootstrap/ng-bootstrap';
import { AccommodationsService } from '../../accommodations.service';
import { AccomodationsItemComponent } from '../item/item.component';
import { IAccomodationsItem } from '../../accommodation.type';

@Component({
  selector: 'accomodations-list',
  standalone: true,
  imports: [NgbPaginationModule, AccomodationsItemComponent],
  templateUrl: './list.component.html',
})
export class AccomodationsListComponent implements OnInit {
  protected accommodations: IAccomodationsItem[] = [];
  protected service = inject(AccommodationsService);
  public total: number = 0
  public page: number = 1;
  public perPage: number = 5;
  public query: string = '';

  ngOnInit(): void {
    this.pageChange(1);
  }

  pageChange(page: number): void {
    const response = this.service.getAccommodationsPagination(page, this.query);
    response.subscribe((response) => {
      this.accommodations = response.data;
      this.perPage = response.per_page;
      this.total = response.total;
    })
  }
}
