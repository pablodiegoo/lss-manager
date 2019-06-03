import {Component, OnInit} from '@angular/core';
import {CozBuildingDayResource, CozBuildingDayResponse} from './buliding/reponse';
import {CozService} from './coz.service';

@Component({
    templateUrl: './building-day.component.html',
    styles: ['table {width: 100%;}']
})
export class CozBuildingDayComponent implements OnInit {
    private readonly defaultColumns = ['base'];

    resources: CozBuildingDayResource[];
    columnNames: string[] = [];
    dataSource = [];

    constructor(
        private cozService: CozService,
    ) {
    }

    ngOnInit(): void {
        this.cozService.getBuildingData().subscribe(
            (response: CozBuildingDayResponse) => {
                console.log(response);

                this.resources = response.resources;
                this.columnNames = this.defaultColumns.slice(0);

                for (const resource of response.resources) {
                    this.columnNames.push(resource.name);
                }

                for (const base of response.bases) {
                    const row: any = {};

                    row.base = base.name + '<br>' + base.type + '<br>Lvl. ' + base.level;
                    row.resources = {} as any;

                    for (const resource of response.resources) {
                        row.resources[resource.name] = 0;
                    }

                    this.dataSource.push(row);
                }

                console.log(this.dataSource);
            },
            error => console.log('ERROR', error),
        );
    }
}
