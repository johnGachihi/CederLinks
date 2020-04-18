import React, {createRef, useEffect, useState} from 'react'
import defaultImage from "../../assets/images/philippe-unsplash.jpg";

function ImageUploader(props) {
    const imageInput = createRef()
    const imageEl = createRef()
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
        </div>
    )
}

export default ImageUploader
