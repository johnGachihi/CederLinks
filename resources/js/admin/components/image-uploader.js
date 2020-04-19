import React, {useRef, useEffect, useState} from 'react'
import defaultImage from "../../assets/images/philippe-unsplash.jpg";
import ReactTooltip from "react-tooltip"

function ImageUploader(props) {
    const imageInput = useRef(null)
    const imageEl = useRef(null)
    const [image, setImage] = useState(null)

    useEffect(() => {
        if (image) {
            const reader = new FileReader();
            reader.onload = e => imageEl.current.src = e.target.result;
            reader.readAsDataURL(image)
        }
    }, [image])

    function handleImageChange(e) {
        const file = e.target.files[0]
        if (file) {
            setImage(file)
            props.onImageChange(file)
        }
    }

    return (
        <div className={props.cssClass}>
            <img
                width="100%"
                height="100%"
                src={defaultImage}
                onClick={() => imageInput.current.click()}
                data-tip="Click to change image"
                ref={imageEl}
                alt="Mission image"
                style={{objectFit: 'cover'}}
            />
            <input
                type="file"
                accept="image/*"
                ref={imageInput}
                style={{display: 'none'}}
                onChange={handleImageChange}
            />
            <ReactTooltip place="bottom" type="dark" effect="solid" delayShow={700}/>
        </div>
    )
}

export default ImageUploader
