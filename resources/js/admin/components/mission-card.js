import React, { useMemo } from "react";
import { Link } from "react-router-dom";
import "../../../sass/admin/mission-card.scss";
import defaultImage from "../../assets/images/philippe-unsplash.jpg";

function MissionCard(props) {
    const { day, month, year } = useDate(props.date);
    const descriptionPreview = useDescriptionPreview(props.description);

    return (
        <div className="col-md-4 d-flex">
            <div className="blog-entry justify-content-end">
                <div className="text px-4 py-4">
                    <h3 className="heading mb-0">
                        <Link to={`/make-mission/${props.id}`} data-testid="title">
                            {props.title ?? '[no-title-provided]'}
                        </Link>
                    </h3>
                </div>
                <Link to={`/make-mission/${props.id}`}>
                    <img
                        className="block-20 object-fit-cover"
                        src={
                            props.image
                                ? `${process.env.IMAGES_URL}/${props.image}`
                                : defaultImage
                        }
                        width="100%"
                        data-testid="image"
                        alt={`Mission image for ${props.title}`}
                    />
                </Link>
                <div className="text p-4 float-right d-block">
                    <div className="topper d-flex align-items-center">
                        <div className="one py-2 pl-3 pr-1 align-self-stretch">
                            <span className="day" data-testid="day">
                                {day}
                            </span>
                        </div>
                        <div className="two pl-0 pr-3 py-2 align-self-stretch">
                            <span className="yr" data-testid="year">
                                {year}
                            </span>
                            <span className="mos" data-testid="month">
                                {month}
                            </span>
                        </div>
                    </div>
                    <p className="description" data-testid="description">
                        {descriptionPreview}
                    </p>
                    <p>
                        <Link
                            to={`/make-mission/${props.id}`}
                            className="btn btn-primary"
                        >
                            Edit
                        </Link>
                    </p>
                </div>
            </div>
        </div>
    );
}

function useDate(date) {
    return useMemo(() => {
        const monthNames = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];

        let _date = { day: "-", month: "-", year: "-" };
        if (date)
            _date = {
                day: date.getDate(),
                month: monthNames[date.getMonth()],
                year: date.getFullYear()
            };
        return _date;
    }, [date]);
}

const useDescriptionPreview = description =>
    useMemo(() => {
        if (description) {
            const tempContainer = document.createElement("div");
            tempContainer.innerHTML = description;
            const firstP = tempContainer.getElementsByTagName("p")[0];
            return firstP ? firstP.innerHTML : "";
        } else {
            return "[no-description]";
        }
    }, [description]);

export default MissionCard;
