import React, {Component} from 'react'; // eslint-disable-line

export default class NotificationMessage extends Component {
    constructor() {
        super();

    }


    render() {
        this.successList = this.props.success.map((item, key) =>
            <div key={key} className="alert alert-success text-center">
                {item}
            </div>
        );
        this.errorsList = this.props.errors.map((item, key) =>
            <div key={key} className="alert alert-danger text-center">
                {item}
            </div>
        );
        return (
            <div>
                {this.successList}
                {this.errorsList}
            </div>
        );
    }
}

