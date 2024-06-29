import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
    providedIn: 'root',
})
export class ApiService {

    private API_URL = 'http://localhost/api';

    constructor(private client: HttpClient) { }

    public request(
        url: string,
        options: any = {},
        method: 'GET' | 'POST' | 'PUT' | 'DELETE' = 'GET',
    ): Observable<any> {
        return this.client.request(method, this.API_URL + url, options);
    }
}
