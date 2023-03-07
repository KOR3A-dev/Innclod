import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { environment } from '../environments/environments';

@Injectable({
  providedIn: 'root'
})
export class DocumentService {

  constructor(private http:HttpClient){ }

  createDocument(documentData: any) {
    return this.http.post(`${environment.baseUrl}create/document`, documentData);
  }

  documentsAll() {
    return this.http.get(`${environment.baseUrl}documents`,);
  }

  updateDocument(documentDataUpdate: any, id: any) {
    return this.http.put(`${environment.baseUrl}update/document/${id}`, documentDataUpdate);
  }
}
