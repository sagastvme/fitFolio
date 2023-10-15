class QuoteSchema {
    title: string;
    imgPath: string;
    body: string;
    hashed_id: string;
    _id: string;
    constructor(title: string, imgPath: string, body: string,  hashed_id: string, _id: string) {
        this.title = title;
        this.imgPath = imgPath;
        this.body = body;
        this.hashed_id = hashed_id;
        this._id = _id
    }
}

export default QuoteSchema;
