import requests as request

class Api:
    def __init__(self, token, domainApi):
        self.token = token
        self.domainApi = domainApi

    def get(self, plant):
        # Gets a plant
        response = request.get(self.domainApi + "/get?token=" + self.token + "&plant=" + plant)

        return response.json()

    def edit(self, plant, water, nutrition, light):
        # Updates a plant
        strBuilder = self.domainApi + '/edit?token=' + self.token + '&plant=' + plant
        if water is not None:
            strBuilder = strBuilder + '&water=' + str(water)
        if nutrition is not None:
            strBuilder = strBuilder + '&nutrition=' + str(nutrition)
        if light is not None:
            strBuilder = strBuilder + '&light=' + str(light)

        response = request.get(strBuilder)

        return response

    def create(self, plant):
        # Creates a plant
        # Currently not supported
        response = request.get('www.test.example')
