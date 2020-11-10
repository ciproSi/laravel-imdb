import React from 'react';

const MovieDetail = (props) => {
    const { name, color_code, genres } = props.movie;
   

    return (
        <>
            <div>{ name }</div>
            <div>{ color_code }</div>
            {
                genres.map((genre, index) => (
                    <div key={index}>{ genre.name }</div>
                ))
            }
        </>
    )
}

export default MovieDetail;
