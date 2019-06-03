export class CozBuildingDayBase {
    id: number;
    name: string;
    level: number;
    type: string;
}

export class CozBuildingDayResource {
    id: number;
    name: string;
}

export class CozBuildingDayResponse {
    bases: CozBuildingDayBase[];
    resources: CozBuildingDayResource[];
}
