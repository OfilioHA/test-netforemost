import { Component, Input, OnChanges, OnInit, inject, SimpleChanges } from '@angular/core';
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
export class AccomodationsListComponent implements OnInit, OnChanges {

  @Input() query: any = {};

  protected accommodations: IAccomodationsItem[] = [];
  protected service = inject(AccommodationsService);
  public total: number = 5;
  public page: number = 1;
  public perPage: number = 5;
  public average: number | null = null;

  ngOnInit(): void { }

  pageChange(page: number): void {
    this.fetchData(page, this.query)
  }

  ngOnChanges(changes: SimpleChanges): void {
    console.log(changes['query'].currentValue)
    this.fetchData(1, this.query);
  }

  fetchData(page: number, query: any) {
    const response = this.service.getAccommodationsPagination(page, this.query);
    response.subscribe((response) => {
      const pagination = response.pagination;
      this.accommodations = pagination.data;
      this.perPage = pagination.per_page;
      this.total = pagination.total;
      this.average = response.average;
    })
  }

}
