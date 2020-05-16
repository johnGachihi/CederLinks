let shouldSucceed = true;

function __setNextRequestToFail(_shouldSucceed) {
    shouldSucceed = _shouldSucceed;
}

function readAll() {
    return Promise.resolve([
        {
            id: 1,
            title: "Mission 1",
            description: "<p>Mission 1 description</p>",
            descriptionPreview: "Mission 1 description",
            date: "2019-06-04",
            status: "published"
        },
        {
            id: 2,
            title: "Mission 2",
            description: "<p>Mission 2 description</p>",
            descriptionPreview: "Mission 2 description",
            date: "2020-07-03",
            status: "draft"
        }
    ]);
}

function read() {
    const _shouldSucceed = shouldSucceed;
    shouldSucceed = true;

    return _shouldSucceed
        ? Promise.resolve({
              id: 1,
              title: "Mission 1",
              description: "<p>Mission 1 description</p>",
              descriptionPreview: "Mission 1 description",
              date: "2019-06-05",
              status: "published"
          })
        : Promise.reject("Failed");
}

function create() {
    const _shouldSucceed = shouldSucceed;
    shouldSucceed = true;

    return _shouldSucceed
        ? Promise.resolve({
              id: 3
          })
        : Promise.reject("Failed");
}

function update() {
    return Promise.resolve({
        id: 1,
        title: "Mission 1",
        description: "<p>Mission 1 description</p>",
        descriptionPreview: "Mission 1 description",
        date: "2019-06-06",
        status: "published"
    });
}

function remove() {
    return Promise.resolve({ status: "ok" });
}

export { read, readAll, update, create, remove, __setNextRequestToFail };
