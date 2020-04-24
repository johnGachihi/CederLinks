import 'isomorphic-fetch'
import client from '../../../network/api-client'
import fetchMock, {enableFetchMocks} from 'jest-fetch-mock'
import sinon from "sinon";
import {getCsrfToken} from "../../../utils/csrf";

jest.mock('../../../utils/csrf');

enableFetchMocks();

beforeEach(() => fetchMock.resetMocks());

test('should resolve with data in response when response ok', function () {
    fetchMock.mockResponse(JSON.stringify({data: 'test', user: 'john'}))

    return client('whatever').then(data => {
        expect(data).toStrictEqual({data: 'test', user: 'john'})
    });
})

test('should reject with data in response when response not ok', () => {
    fetchMock.mockResponse(
        JSON.stringify({data: 'test', error: 'error'}),
        {status: 500}
    )

    return client('whatever').catch(err => {
        expect(err).toStrictEqual({data: 'test', error: 'error'})
    })
})

describe('fetch response has status 401', () => {
    beforeEach(() => {
        fetchMock.mockResponse(JSON.stringify({}), {status: 401})
    })

    test('should not reject', () => {
        return client('whatever').then(d => {})
    })

    test('should cause redirect to auth-modal in visitors module', () => {
        // sinon.stub(window.location, 'assign')
        //////// LEFT OFF HERE !!!!!
        return client('whatever').then(data => {
            expect(window.location.assign).toBeCalledWith(`http://localhost/`)
        })
    })
})

test('should be a POST request if body provided', () => {
    fetchMock.mockResponse(JSON.stringify({data: 'test'}));

    return client('whatever', {body: 'data'}).then(() => {
        expect(fetch.mock.calls[0][1]).toMatchObject({method: 'POST'})
    });
})

describe('test client calls window.fetch with correct arguments', () => {
    beforeEach(() => {
        fetchMock.mockResponse(JSON.stringify({data: 'test'}));
    })

    test('url', () => {
        return client('whatever/1').then(() => {
            expect(fetch.mock.calls[0][0]).toBe(`${process.env.APP_URL}/whatever/1`)
        })
    })

    test('config headers', () => {
        getCsrfToken.mockReturnValue('qwerty123456')

        const config = {headers: {header: 'header'}};
        return client('whatever', null, config).then(() => {
            expect(fetch.mock.calls[0][1]).toMatchObject({
                headers: {
                    'X-CSRF-TOKEN': 'qwerty123456',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'header': 'header'
                }
            })
        })
    })

    test('config method', () => {
        getCsrfToken.mockReturnValue('qwerty123456')

        const config = {method: 'PUT'};
        return client('whatever', null, config).then(() => {
            expect(fetch.mock.calls[0][1]).toMatchObject({
                method: 'PUT'
            })
        })
    })

    test('body is stringified when object provided as data', () => {
        const body = {body: 'data'}
        return client('whatever', body).then(() => {
            expect(fetch.mock.calls[0][1]).toMatchObject(
                {body: JSON.stringify(body)})
        })
    })

    test('body is FormData when FormData provided as data', () => {
        const body = new FormData()
        return client('whatever', body).then(() => {
            expect(fetchMock.mock.calls[0][1].body).toBeInstanceOf(FormData)
        })
    })
})
