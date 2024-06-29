import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ApiService } from '../../core/services/api.service';

@Injectable({
    providedIn: 'root',
})
export class AccommodationsService extends ApiService {
    public getAccommodationsPagination(page: number, query: string) {
        const request = this.request('/acccommodations', {
            params: {
                page: page
            } 
        });
        return request;
    }
}
