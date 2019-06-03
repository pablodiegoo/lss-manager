import {HttpClient} from '@angular/common/http';
import {Injectable} from '@angular/core';

@Injectable({providedIn: 'root'})
export class CozService {
    constructor(
        private http: HttpClient,
    ) {
    }

    getBuildingData() {
        return this.http.get('http://localhost:8000/api/building-day/');
    }
}
