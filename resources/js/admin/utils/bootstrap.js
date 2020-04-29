import {getUser} from "../../network/auth-client";
import * as missionsClient from "../../network/missions-client";
import {queryCache} from "react-query";

async function bootstrapAppData() {
    let appData

    const [user, missions] = await Promise.all([
        getUser().catch(() => null),
        missionsClient.readAll().catch(() => [])
    ])
    appData = {user, missions}

    queryCache.setQueryData('missions', missions)
    for (const mission of missions)
        queryCache.setQueryData(['mission', {id: mission.id}])

    return appData;
}

export default bootstrapAppData
