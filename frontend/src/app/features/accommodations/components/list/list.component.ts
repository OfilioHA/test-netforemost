import { Component, Input, OnChanges, OnInit, inject, SimpleChanges } from '@angular/core';
import { NgbPaginationModule } from '@ng-bootstrap/ng-bootstrap';
import { AccommodationsService } from '../../accommodations.service';
import { AccomodationsItemComponent } from '../item/item.component';
import { IAccomodationsItem } from '../../accommodation.type';

@Component({
  selector: '[accomodations-list]',
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
  public loading: boolean = false;

  ngOnInit(): void { }

  pageChange(page: number): void {
    this.fetchData(page)
  }

  ngOnChanges(changes: SimpleChanges): void {
    this.fetchData(1);
  }

  fetchData(page: number) {
    this.loading = true;
    const response = this.service.getAccommodationsPagination(page, this.query);
    response.subscribe((response) => {
      const pagination = response.pagination;
      this.accommodations = pagination.data;
      this.perPage = pagination.per_page;
      this.total = (pagination.total) ? pagination.total : 1;
      this.average = response.average;
      this.loading = false;
    })
  }

}
