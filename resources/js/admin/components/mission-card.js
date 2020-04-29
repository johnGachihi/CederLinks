import React, {useMemo} from "react";
import '../../../sass/admin/mission-card.scss'

function MissionCard(props) {

    const {day, month, year} = useMemo(() => {
        return {
            day: props.date ? props.date.getDay() : '-',
            month: props.date ? props.date.getMonth() + 1 : '-',
            year: props.date ? props.date.getFullYear() : '-'
        }
    }, [props.date])

    const descriptionPreview = useMemo(() => {
        if (props.description) {
            const tempContainer = document.createElement('div')
            tempContainer.innerHTML = props.description
            const firstP = tempContainer.getElementsByTagName('p')[0]
            return firstP ? firstP.innerText : ''
        }
    }, [props.description])

    return (
        <div className="col-md-4 d-flex ftco-animate">
            <div className="blog-entry justify-content-end">
                <div className="text px-4 py-4">
                    <h3 className="heading mb-0"><a href="#">{props.title}</a></h3>
                </div>
                <a href="blog-single.html">
                    <img className="block-20 object-fit-cover"
                         src={`${process.env.IMAGES_URL}/${props.image}`}
                         width="100%" />
                </a>
                <div className="text p-4 float-right d-block">
                    <div className="topper d-flex align-items-center">
                        <div className="one py-2 pl-3 pr-1 align-self-stretch">
                            <span className="day" data-testid="day">{day}</span>
                        </div>
                        <div className="two pl-0 pr-3 py-2 align-self-stretch">
                            <span className="yr" data-testid="year">{year}</span>
                            <span className="mos" data-testid="month">{month}</span>
                        </div>
                    </div>
                    <p className="description" data-testid="description">{descriptionPreview}</p>
                    <p><a href="#" className="btn btn-primary">Read more</a></p>
                </div>
            </div>
        </div>
    )
}

export default MissionCard
