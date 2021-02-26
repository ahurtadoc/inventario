import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import {ListarComponent} from "./listar/listar.component";

const routes: Routes = [
  {path:'listar', component: ListarComponent},
  { path: '',   redirectTo: '/', pathMatch: 'full' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
