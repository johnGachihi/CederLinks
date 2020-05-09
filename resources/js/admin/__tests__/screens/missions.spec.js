import React from "react";
import "isomorphic-fetch";
import fetchMock from "jest-fetch-mock";
import { render, fireEvent } from "@testing-library/react";
import {
    queryByAttribute,
    waitForElementToBeRemoved,
    findByRole,
    findByText
} from "@testing-library/dom";
import Missions from "../../screens/missions";
import { BrowserRouter } from "react-router-dom";
import { act } from "react-dom/test-utils";
import { toHaveTextContent, toBeVisible } from "@testing-library/jest-dom";
import * as missionsClient from "../../../network/missions-client";

jest.mock("../../../utils/csrf");
jest.mock("../../../network/missions-client");

async function renderMissionsPage(missions) {
    if (missions === undefined) {
        missions = await missionsClient.readAll();
    } else {
        missionsClient.readAll = jest.fn(() => Promise.resolve(missions));
    }

    const utils = render(
        <BrowserRouter>
            <Missions />
        </BrowserRouter>
    );

    return {
        ...utils,
        missions
    };
}

describe("<Missions/>", () => {
    afterEach(() => fetchMock.resetMocks());

    test(`Published missions displayed`, async () => {
        const {
            getByRole,
            missions,
            container
        } = await renderMissionsPage();

        fireEvent.click(getByRole("tab", { name: "Published" }));

        for (const mission of missions) {
            if (mission.status === "published") {
                await expectMissionCardVisible(container, mission)
            }
        }
    });

    test(`Draft missions displayed`, async () => {
        const {
            getByRole,
            missions,
            container
        } = await renderMissionsPage();

        fireEvent.click(getByRole("tab", { name: "Drafts" }));
        await act(() => Promise.resolve())

        for (const mission of missions) {
            if (mission.status === "draft") {
                await expectMissionCardVisible(container, mission)
            }
        }
    })

    test(`Loader shown on clicking 'Add Mission' button`, async () => {
        const { container, getByText } = await renderMissionsPage();

        fireEvent.click(getByText("Add Mission"));

        const getByClassName = queryByAttribute.bind(null, "class");
        await waitForElementToBeRemoved(
            () => getByClassName(container, "css-0") // Loader has className="css-0"
        );
        await act(() => Promise.resolve());
    });

    test(`When 'Add Mission' request fails, alert is shown`, async () => {
        const { findByText, getByText } = await renderMissionsPage();
        missionsClient.__setNextRequestToFail(false);

        fireEvent.click(getByText("Add Mission"));

        await findByText("Error experienced unable to create mission");
    });

    test(`When there are no published missions, illustration shown`, async () => {
        const { findByRole } = await renderMissionsPage([]);

        await findByRole("img", { name: "No published missions illustration" });
    });

    test(`When there are no draft missions, illustration shown`, async () => {
        const { findByRole, getByRole } = await renderMissionsPage([]);

        fireEvent.click(getByRole("tab", { name: "Drafts" }));

        await findByRole("img", { name: "No draft missions illustration" });
        act(() => {});
    });
});


async function expectMissionCardVisible(container, mission) {
    expect(
        await findByRole(container, "heading", { name: mission.title })
    ).toBeVisible();
    expect(
        await findByRole(container, "img", {
            name: `Mission image for ${mission.title}`
        })
    ).toBeVisible();
    expect(
        await findByText(container, mission.descriptionPreview)
    ).toBeVisible();
}