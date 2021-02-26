import { Component, OnInit } from '@angular/core';
import {InventarioService} from "../services/inventario.service";

@Component({
  selector: 'app-listar',
  templateUrl: './listar.component.html',
  styleUrls: ['./listar.component.sass']
})
export class ListarComponent implements OnInit {

  productos: any
  constructor(private inventarioService : InventarioService) { }

  ngOnInit(): void {
    this.inventarioService.get().subscribe( res => {
      this.productos = res;
    })

  }

}
