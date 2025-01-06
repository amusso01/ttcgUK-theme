import axios from 'axios'
import Qs from 'qs'

export default function ajaxFilter() {
	const myButtons = document.querySelectorAll('.filterBtn')
	const loader = document.querySelector('.fdry-filter__loader')
	myButtons.forEach((myButton) => {
		myButton.addEventListener('click', (e) => {
			// show loader
			loader.classList.add('active')

			// Disable all buttons
			myButtons.forEach((button) => (button.disabled = true))
			myButtons.forEach((button) => button.classList.remove('selected'))

			// Enable the clicked button
			e.target.disabled = false
			let size = e.target.dataset.filter
			let data = {
				action: 'getSmallCars',
				data: {
					size: size,
				},
			}
			queryCars(data).then(() => {
				// Re-enable all buttons
				myButtons.forEach((button) => (button.disabled = false))
				// hide loader
				loader.classList.remove('active')
				e.target.classList.add('selected')
			})
		})
	})
}

async function queryCars(data) {
	await axios
		.post(
			`${window.location.origin}/wp-admin/admin-ajax.php`,
			Qs.stringify(data)
		)
		.then((response) => {
			const cars = response.data.data
			const container = document.getElementById('filterContainer')

			let html = ''
			cars.forEach((car) => {
				let carInStock = car.total_make_in_stock // This is the total number of cars in stock
				let carMake = car.make_title // This is the make of the car Audi, Fiat, etc
				let carModel = car.model_title // This is the model of the car A3, A4, etc
				let carId = car.car_id

				html += `
          <div class="fdry-car-single-card">

           <div class="mix-discount-save white">

                <p class="drop stockCount">
                    <span class="red">${carInStock}</span>
                    <span class="bold">${carMake}</span>'s
                    in group stock!
                </p>

            </div>
            <div class="fdy-car-single-card__image">
              <a href="/cars/${car.make_name}/${car.model_name}/${carId}">
                <figure data-vrm="${car.reg_number}">
                  <img class="car-img" src="https://cdn-08.imagin.studio/getImage?&customer=gbtradecentregroupplc&tailoring=tradecentre&make=${
										car.make_name
									}&modelFamily=${car.model_name}&modelYear=${
					car.reg_year
				}&modelRange=${car.model_name}&modelVariant=${
					car.body_type
				}&powerTrain=&bodySize=&trim=&paintDescription=${
					car.paint_description
				}&rimId=&rimDescription=&interiorId=&interiorDescription=&fileType=webp&zoomType=fullscreen&zoomLevel=1&width=400&angle=1&safeMode=false&groundPlaneAdjustment=-0.80&countryCode=GB" alt="${
					car.make_name
				} ${car.model_name}">
                </figure>
              </a>
            </div>

						<div class="fdry-single-car__mobile">
							<div class="fdry-single-car__mobile-title">
									<h1 class="car-name-mobile">${car.title}</h1>
									<p class="model-mobile">${car.derivative}</p>
							</div>
							<div class="featurecar" style="margin-bottom:30px">
                <div class="featurebox">
                    <p class="spec">${car.fueltype}</p>
                </div>
 
                <div class="featurebox">
                    <p class="spec">${car.mileage} Miles</p>
                </div>

        			</div>

							<div class="fdry-single-car__mobile-price">
								<div class="red-box">
										<p class="blue-box-text drop">Pay Only</p>
										<p class="cost-text drop">&pound;${car.discounted_price - 2000}</p>
										<p class="blue-box-text drop" style="font-size: 12px;">With Part-Exchange</p>
								</div>
								<p class="price-divider">
										<span>OR</span> <br> JUST
								</p>
								<div class="blue-box">
										<p class="blue-box-text drop">Fixed</p>
										<div class="cost-text drop">&pound;${car.finance}</div>
										<p class="blue-box-text drop">Per Month</p>
								</div>
							</div>
 						</div>

						<div class="fdry-single-car__mobile-finance-check">
							<a href="/finance-check?make=${car.make_name}&model=${car.model_name}&vid=${
					car.stock_number
				}" class="fdry-finance-check-mobile__btn-img">
									<img src="${
										window.location.origin
									}/wp-content/themes/tradecentreukFDRY/dist/images/Finance.svg" alt="Free finance check button">
							</a>
						</div>


          </div>
        `
			})
			container.innerHTML = html
			// cars.forEach((car) => {
			// 	const carCard = document.createElement('div')
			// 	carCard.classList.add('fdy-car-single-card__image')

			// 	const link = document.createElement('a')
			// 	link.href = `/cars/${car.make}/${car.model}/${car.id}`

			// 	const figure = document.createElement('figure')
			// 	figure.dataset.vrm = car.vrm

			// 	const img = document.createElement('img')
			// 	img.classList.add('car-img')
			// 	img.src = `https://cdn-08.imagin.studio/getImage?&customer=gbtradecentregroupplc&tailoring=tradecentre&make=${car.make}&modelFamily=${car.model}&modelYear=${car.year}&modelRange=${car.modelRange}&modelVariant=${car.modelVariant}&powerTrain=&bodySize=&trim=&paintDescription=${car.paintDescription}&rimId=&rimDescription=&interiorId=&interiorDescription=&fileType=webp&zoomType=fullscreen&zoomLevel=1&width=400&angle=1&safeMode=false&groundPlaneAdjustment=-0.80&countryCode=GB`
			// 	img.alt = `${car.make} ${car.model}`

			// 	figure.appendChild(img)
			// 	link.appendChild(figure)
			// 	carCard.appendChild(link)

			// 	container.appendChild(carCard)
			// })
		})
		.catch((error) => {
			console.error(error)
		})
}
