import mongodb from "mongoose";

const User = mongodb.model(
	"User",
	new mongodb.Schema(
		{
			_id: {
				type: String,
				required: true
			}
		} as const,
		{ _id: false }
	)
);

export default User;