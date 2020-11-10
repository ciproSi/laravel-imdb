import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import {
    BrowserRouter as Router,
    Switch,
    Route
} from 'react-router-dom';
import App from './App/App.jsx';

ReactDOM.render(
    <Router>
        <Switch>
            <Route path='/movie/:id/*' children={ <App /> } />
            <Route path='/movie/:id' children={ <App /> } />
                    
        </Switch>        
    </Router>

, document.getElementById('app'));