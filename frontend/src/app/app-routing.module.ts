import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';
import {CozBuildingDayComponent} from './coz/building-day.component';

const routes: Routes = [
    {path: 'coz/building-day', component: CozBuildingDayComponent},
    {
        path: '',
        redirectTo: '/coz/building-day',
        pathMatch: 'full'
    },
];

@NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule]
})
export class AppRoutingModule {
}
