import React, {useEffect, useState} from 'react';
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link,
    useParams
} from 'react-router-dom';
import MovieDetail from '../MovieDetail/MovieDetail';


const App = () => {
    const [movie, setMovie] = useState([]);
    const [{loading, loaded}, setDataState] = useState({
        loading: false,
        loaded: false
    });
    
    let { id } = useParams();

    const fetchData = async () => {
        setDataState({
            loading: true,
            loaded: false
        });
        const url = '/api/movies/' + id;
        const resp = await fetch(url);
        const movie = await resp.json();

        resp && movie && setMovie(movie);

        setDataState({
            loading: false,
            loaded: true
        });
    }
    
    useEffect(() => {
        fetchData();
    }, [])
    
    let content = '';

    if (loading) {
        content = (
            <h1>loading data</h1>
        )
    } else if (loaded) {
        content = (
            <Router>
                <Switch>
                    {/* <Route path='' children= {  } movie={movie}/> */}
                    <Route path='/movie/:id' children= { <MovieDetail movie={movie} /> } />
                </Switch>
            </Router>
        )
    }
    
    return (
        <> 
        
        {content}
        
        </>
    )

}

export default App;

