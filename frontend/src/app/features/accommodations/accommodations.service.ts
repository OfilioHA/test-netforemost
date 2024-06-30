import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ApiService } from '../../core/services/api.service';

@Injectable({
    providedIn: 'root',
})
export class AccommodationsService extends ApiService {
    public getAccommodationsPagination(page: number, query: any) {
        const request = this.request('/acccommodations', {
            params: {
                page: page,
                ...query
            }
        });
        return request;
    }

    public generateReport(values: any) {
        const request = this.request('/acccommodations/report', {
            params: values
        });
        return request;
    }

}
