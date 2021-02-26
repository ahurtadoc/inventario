import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from "@angular/common/http";
import {Observable} from "rxjs";

@Injectable({
  providedIn: 'root'
})
export class InventarioService {
  url: string;
  httpOptions: object;
  constructor(private http: HttpClient) {
    this.url = "http//:localhost/inventario/productos";
    this.httpOptions = {
      headers: new HttpHeaders({
        'Content-Type':'application/json'
      })

    }
  }

  get():Observable<any>{
    return this.http.get<any>(this.url);
  }

  create(producto: any): Observable<any>{
    return this.http.post<any>(this.url,producto,this.httpOptions)
  }

  update(datos: any): Observable<any>{
    return this.http.put<any>(this.url,datos,this.httpOptions)
  }

  delete(id:any): Observable<any>{
    // @ts-ignore
    this.httpOptions.body = id;
    return this.http.delete<any>(this.url,this.httpOptions)
  }

  sell(id: any): Observable<any>{
    return this.http.post<any>(this.url,this.httpOptions)
  }

}
