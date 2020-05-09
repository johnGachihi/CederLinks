import fetchMock, { enableFetchMocks } from "jest-fetch-mock";

process.env.REACT_APP_API_URL = "http://cederlinks.com"

enableFetchMocks()