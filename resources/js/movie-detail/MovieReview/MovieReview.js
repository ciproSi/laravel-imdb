import { divide } from 'lodash';
import React, { useState } from 'react';

const MovieReview = (props) => {
    const [rating, setRating] = useState('');
    const [reviewText, setReviewText] = useState('');
    
    const { id } = props;
    const { name } = props.movie;

    const handleRatingChange = (e) => {
        setRating(e.target.value);
    }

    const handleReviewTextChange = (e) => {
        setReviewText(e.target.value);
    }

    
    const handleSubmit = async (e) => {
        e.preventDefault();
        
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        console.log(token);
        const data = {rating: rating,
                        text: reviewText};

        const url = '/api/movies/' + id + '/review';
        
        const resp = await fetch(url, {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-type': 'application/json',
                'X-CSRF-TOKEN': token
            }
        });


    }
        
    return (
        <>
            <div>Editing { name}</div>
            <div>Movie id { id } </div>

            <form onSubmit={ handleSubmit }> 
                <label htmlFor="rating">Rating:
                <input 
                    type="number"
                    name="rating"
                    value={ rating }
                    onChange={ handleRatingChange } />
                </label>
                <br/>

                <div>Letters remaining: { 180 - reviewText.length}</div>
                
                <textarea 
                    cols="30"
                    rows="10"
                    name="review-text" 
                    value={ reviewText } 
                    onChange={ handleReviewTextChange } />
                <button>Submit</button>
            </form>
        </>

    )
}

export default MovieReview;
