import React, {useRef, useMemo} from 'react'
import defaultImage from "../../assets/images/philippe-unsplash.jpg"
import ReactTooltip from "react-tooltip"

function ImageUploader(props) {
    const imageInput = useRef(null)

    function handleImageChange(e) {
        const file = e.target.files[0]
        if (file) {
            props.onImageChange(file)
        }
    }

    const imageSrc = useMemo(() => {
        return props.image instanceof File
            ? URL.createObjectURL(props.image)
            : props.image
    }, [props.image])

    return (
        <div className={props.cssClass}>
            <img
                width="100%"
                height="100%"
                src={imageSrc ?? defaultImage}
                onClick={() => imageInput.current.click()}
                data-tip="Click to change image"
                alt="Mission image"
                style={{objectFit: 'cover'}}
                onLoad={e => URL.revokeObjectURL(e.target.src)}
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
