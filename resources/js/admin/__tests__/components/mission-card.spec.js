import React from "react";
import { render } from "@testing-library/react";
import { toHaveClass } from "@testing-library/jest-dom";
import MissionCard from "../../components/mission-card";
import { BrowserRouter } from "react-router-dom";

describe("<MissionCard/>", () => {
    describe("Date", () => {
        test("Renders date correctly", () => {
            const date = new Date(2020, 4 - 1, 29);
            const { getByTestId } = render(
                <BrowserRouter>
                    <MissionCard date={date} />
                </BrowserRouter>
            );

            expect(getByTestId("day")).toHaveTextContent(date.getDate());
            expect(getByTestId("year")).toHaveTextContent("2020");
            expect(getByTestId("month")).toHaveTextContent("April");
        });

        test(`renders '-' when date is null`, () => {
            const { getByTestId } = render(
                <BrowserRouter>
                    <MissionCard />
                </BrowserRouter>
            );

            expect(getByTestId("day")).toHaveTextContent("-");
            expect(getByTestId("year")).toHaveTextContent("-");
            expect(getByTestId("month")).toHaveTextContent("-");
        });
    });

    describe("Description", () => {
        test(`description preview (first p tag's content) rendered`, () => {
            const description = `
                <span>Ble ble</span>
                <p>This is the heading of the mission's description.</p>
                <p>This is more content of the mission description.</p>
                <p>This is more content of the mission description.</p>
            `.trim();
            const { getByTestId } = render(
                <BrowserRouter>
                    <MissionCard description={description} />
                </BrowserRouter>
            );

            expect(getByTestId("description")).toHaveTextContent(
                `This is the heading of the mission's description.`
            );
        });

        test(`renders '[no-description]' when description is null`, () => {
            const { getByTestId } = render(
                <BrowserRouter>
                    <MissionCard description={null} />
                </BrowserRouter>
            );

            expect(getByTestId("description")).toHaveTextContent(
                "[no-description]"
            );
        });
    });

    describe("Image", () => {
        test("default image rendered when image is null", () => {
            const { getByTestId } = render(
                <BrowserRouter>
                    <MissionCard />
                </BrowserRouter>
            );

            expect(getByTestId("image")).toHaveAttribute(
                "src",
                "test-file-stub"
            );
        });
    });

    test(`Title defaults to '[no-title-provided]'`, () => {
        const { getByTestId } = render(
            <BrowserRouter>
                <MissionCard />
            </BrowserRouter>
        );

        expect(getByTestId("title")).toHaveTextContent("[no-title-provided]");
    });
});
