import ThreeSixty from '@mladenilic/threesixty.js'
import * as basicRotate from 'basicrotate'

export default function threeDCarModel() {
	// Get the script element by its ID
	// let dataScript = document.getElementById('dataImageUrl')
	// // Parse the JSON object from the script's content
	// let jsonData = JSON.parse(dataScript.textContent)

	// let resultArray = [] // Initialize an empty array to store the strings
	// let UrlString = jsonData.imageUrl

	// for (let i = 1; i <= 32; i++) {
	// 	let resultString = UrlString + '&angle=' + (i + 200)
	// 	resultArray.push(resultString)
	// }

	// const threesixty = new ThreeSixty(
	// 	document.getElementById('fdryThreeDImages'),
	// 	{
	// 		// Source image url
	// 		image: resultArray,

	// 		// Width & Height
	// 		width: 790, // Image width. Default 300
	// 		height: 564, // Image height. Default 300

	// 		// Navigation
	// 		keys: true, // Rotate image on arrow keys. Default: true
	// 		draggable: true, // Rotate image by dragging. Default: true
	// 		swipeable: true, // Rotate image by swiping on mobile screens. Default: true
	// 		dragTolerance: 10, // Rotation speed when dragging. Default: 10
	// 		swipeTolerance: 10, // Rotation speed when swiping. Default: 10
	// 		swipeTarget: document.getElementById('wrapper'), // Element which will listen for drag/swipe events. Default: Image container

	// 		// Rotation settings
	// 		speed: 100, // Rotation speed during 'play' mode. Default: 10
	// 		inverted: false, // Inverts rotation direction
	// 	}
	// )

	// // threesixty.play()

	const instance = basicRotate.create(
		document.querySelector('.fdryThreeDModel'),
		{
			index: 2,
			tolerance: 20,
		}
	)
}
