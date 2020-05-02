import React from "react";
import "isomorphic-fetch";
import fetchMock, { enableFetchMocks } from "jest-fetch-mock";
import { render, fireEvent } from "@testing-library/react";
import {
    queryByAttribute,
    waitForElementToBeRemoved
} from "@testing-library/dom";
import { waitFor } from "@testing-library/dom";
import { toBeInTheDocuement } from "@testing-library/jest-dom";
import Missions from "../../screens/missions";
import { BrowserRouter } from "react-router-dom";
import * as missionsClient from "../../../network/missions-client";
import { act } from "react-dom/test-utils";

enableFetchMocks();
jest.mock("../../../utils/csrf");

describe("<Missions/>", () => {
    afterEach(() => fetchMock.resetMocks());

    test(`Loader shown on clicking 'Add Mission' button`, async () => {
        fetchMock.mockResponses(
            JSON.stringify([{ id: 1 }, { id: 2 }]),
            JSON.stringify({ id: 1 })
        );

        const { container, getByText } = render(
            <BrowserRouter>
                <Missions />
            </BrowserRouter>
        );

        fireEvent.click(getByText("Add Mission"));

        const getByClassName = queryByAttribute.bind(null, "class");
        await waitForElementToBeRemoved(() =>
            getByClassName(container, "css-0")
        );
        await act(() => Promise.resolve());
    });

    test(`'Add Mission' request fails`, async () => {
        fetchMock.mockResponses(
            [JSON.stringify([{ id: 1 }, { id: 2 }])],
            [JSON.stringify({ id: 1 }), { status: 400 }]
        );

        const { findByText, getByText, getByRole } = render(
            <BrowserRouter>
                <Missions />
            </BrowserRouter>
        );

        fireEvent.click(getByText("Add Mission"));

        await findByText("Error experienced unable to create mission")
        // await waitFor(() =>
        //     expect(
        //         getByText("Error experienced unable to create mission")
        //     ).not.toBeVisible()
        // );
    });
});
