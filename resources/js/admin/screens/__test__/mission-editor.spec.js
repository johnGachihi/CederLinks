import React from "react";
import { BrowserRouter } from "react-router-dom";
import { waitFor, waitForElementToBeRemoved } from "@testing-library/dom";
import { render, fireEvent, act } from "@testing-library/react";
import { toBeVisible } from "@testing-library/jest-dom";
import MissionEditor from "../mission-editor";
import * as missionClient from "../../../network/missions-client";
import * as editor from "../../components/editor";

jest.mock("../../../network/missions-client");
jest.mock("../../components/editor");

async function renderMissionEditor(mission) {
    if (mission === undefined) {
        mission = await missionClient.read();
    } else {
        missionClient.read = jest.fn(() => Promise.resolve(mission));
    }

    const utils = render(
        <BrowserRouter>
            <MissionEditor />
        </BrowserRouter>
    );

    return { ...utils, mission };
}

describe("<MissionEditor/>", () => {
    beforeAll(() => {
        window.matchMedia = jest.fn(() => ({ matches: true }));
    });

    test("Error message shown when there is an editor error", async () => {
        editor.__shouldError("A made up error");
        const { findByText } = await renderMissionEditor();

        await findByText(/A made up error/);
        await act(() => Promise.resolve());
    });

    // test("Mission data shown", async () => {
    //     const { findByRole, findByPlaceholderText, mission } = await renderMissionEditor();

    //     expect(await findByPlaceholderText("Mission title")).toBeVisible();
    // });

    test("Loader shown when 'Save' clicked", async () => {
        const { getByRole } = await renderMissionEditor();

        fireEvent.click(getByRole("button", { name: "Save" }));

        await waitForElementToBeRemoved(
            getByRole("loader", { name: "Saving mission" })
        );
    });

    test("Alert shown whe 'Save' successful", async () => {
        const { getByRole, findByRole } = await renderMissionEditor();

        fireEvent.click(getByRole("button", { name: "Save" }));

        expect(await findByRole("status")).toBeVisible();
    });

    test("Update mission request should be sent on clicking 'Save' button", async () => {
        missionClient.update = jest.fn();
        const { getByRole, getByPlaceholderText } = await renderMissionEditor();

        fireEvent.change(getByPlaceholderText("Mission title"), {
            target: { value: "Ble" }
        });
        fireEvent.click(getByRole("button", { name: "Save" }));

        await waitFor(() => {
            expect(missionClient.update).toHaveBeenCalled();
            expect(missionClient.update.mock.calls[0][1].get("title")).toBe(
                "Ble"
            );
        });

        missionClient.update.mockReset();
    });

    test("Delete mission request sent on clicking 'Delete' in dialog", async () => {
        missionClient.remove = jest.fn();
        const { getByRole, mission } = await renderMissionEditor();

        // fireEvent.click(getByRole("button", { name: "Dropdown button" }))
        fireEvent.click(getByRole("button", { name: "Delete this mission" }));
        fireEvent.click(getByRole("button", { name: "Delete" }));

        await waitFor(() => expect(missionClient.remove).toHaveBeenCalled());
        expect(missionClient.remove).toHaveBeenCalledWith(mission.id);

        missionClient.remove.mockReset();
    });

    test("Update request with status='published' sent on clicking 'Publish'", async () => {
        missionClient.update = jest.fn();

        const { findByRole } = await renderMissionEditor({
            id: 1,
            status: "draft"
        });

        fireEvent.click(await findByRole("button", { name: "Publish" }));

        await waitFor(() => expect(missionClient.update).toHaveBeenCalled());
        expect(missionClient.update.mock.calls[0][1].get("status")).toBe(
            "published"
        );

        missionClient.update.mockReset();
    });

    test("Update request with status='draft' sent on clicking 'Unpublish' button", async () => {
        missionClient.update = jest.fn();
        const { findByRole } = await renderMissionEditor({
            id: 1,
            status: "published"
        });

        fireEvent.click(await findByRole("button", { name: "Unpublish" }));

        await waitFor(() => expect(missionClient.update).toHaveBeenCalled());
        expect(missionClient.update.mock.calls[0][1].get("status")).toBe(
            "draft"
        );

        missionClient.remove.mockReset();
    });
});
