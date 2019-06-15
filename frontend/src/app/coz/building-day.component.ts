import {Component, OnInit} from '@angular/core';
import {CozBuildingDayBase, CozBuildingDayResource, CozBuildingDayResponse} from './buliding/reponse';
import {CozService} from './coz.service';

@Component({
    templateUrl: './building-day.component.html',
    styles: ['table {width: 100%;}']
})
export class CozBuildingDayComponent implements OnInit {
    bases: CozBuildingDayBase[];
    resources: CozBuildingDayResource[];
    baseColumns: string[] = [];
    baseColumns2: string[] = [];
    dataSource = [];

    constructor(
        private cozService: CozService,
    ) {
    }

    ngOnInit(): void {
        this.cozService.getBuildingData().subscribe(
            (response: CozBuildingDayResponse) => {
                this.resources = response.resources;
                this.bases = response.bases;

                this.baseColumns = ['base'];
                this.baseColumns2 = [];
                for (const resource of response.resources) {
                    this.baseColumns.push(resource.name);
                    this.baseColumns2.push('storage');
                    this.baseColumns2.push('box');
                }

                for (const base of response.bases) {
                    const row: any = {};

                    row.base = base;
                    row.resources = {} as any;

                    for (const resource of response.resources) {
                        const storage = 1;
                        const box = 2;
                        const computedStorage = storage;

                        row.resources[resource.name] = {
                            storage,
                            box,
                            computedStorage,
                        };
                    }

                    this.dataSource.push(row);
                }

                console.log(this.bases);
                console.log(this.baseColumns);
                console.log(this.baseColumns2);
            },
            error => console.log('ERROR', error),
        );
    }
}
