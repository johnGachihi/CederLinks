import React from "react";
import "isomorphic-fetch";
import fetchMock, { enableFetchMocks } from "jest-fetch-mock";
import { render, fireEvent } from "@testing-library/react";
import {
    queryByAttribute,
    waitForElementToBeRemoved
} from "@testing-library/dom";
import Missions from "../../screens/missions";
import { BrowserRouter } from "react-router-dom";
import { act } from "react-dom/test-utils";

enableFetchMocks();
jest.mock("../../../utils/csrf");

describe("<Missions/>", () => {
    afterEach(() => fetchMock.resetMocks());

    test(`Missions displayed`, async () => {
        fetchMock.mockResponse(
            JSON.stringify([
                {
                    id: 1,
                    title: "Mission 1",
                    description: "<p>Mission 1 description</p>",
                },
                {
                    id: 2,
                    title: "Mission 2",
                    description: "<p>Mission 2 description</p>",
                }
            ])
        );

        const { findByRole, findByText } = render(
            <BrowserRouter>
                <Missions />
            </BrowserRouter>
        );

        await findByRole("heading", {name: "Mission 1"})
        await findByRole("heading", {name: "Mission 2"})
        await findByRole("img", {name: "Mission image for Mission 1"})
        await findByRole("img", {name: "Mission image for Mission 2"})
        await findByText("Mission 1 description")
        await findByText("Mission 2 description")
    });

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

    test(`When 'Add Mission' request fails, alert is shown`, async () => {
        fetchMock.mockResponses(
            [JSON.stringify([{ id: 1 }, { id: 2 }])],
            [JSON.stringify({ id: 1 }), { status: 400 }]
        );

        const { findByText, getByText } = render(
            <BrowserRouter>
                <Missions />
            </BrowserRouter>
        );

        fireEvent.click(getByText("Add Mission"));

        await findByText("Error experienced unable to create mission");
    });
});
