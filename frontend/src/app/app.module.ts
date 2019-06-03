import {HttpClientModule} from '@angular/common/http';
import {BrowserModule} from '@angular/platform-browser';
import {NgModule} from '@angular/core';
import {AppRoutingModule} from './app-routing.module';
import {AppComponent} from './app.component';
import {CozBuildingDayComponent} from './coz/building-day.component';
import {AppMaterialModule} from './app-material.module';

@NgModule({
    declarations: [
        AppComponent,
        CozBuildingDayComponent,
    ],
    imports: [
        BrowserModule,
        AppRoutingModule,
        AppMaterialModule,
        HttpClientModule,
    ],
    providers: [],
    bootstrap: [AppComponent]
})
export class AppModule {
}
