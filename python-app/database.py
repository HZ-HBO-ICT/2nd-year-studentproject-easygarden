import pymongo


class Database:
    # Database class attributes
    # self.ip
    # self.port
    # self.databaseName
    # self.client
    # self.database

    def __init__(self, ip, port, databaseName):
        self.ip = ip
        self.port = port
        self.databaseName = databaseName

        # check if client can connect
        # TODO: Handle if database does not exist
        self.client = pymongo.MongoClient("mongodb://" + self.ip + ":" + self.port + "/")
        dblist = self.client.list_database_names()
        if self.databaseName in dblist:
            print("Database exists")
        else:
            print("Database does not exist")

        self.database = self.client[databaseName]

    # TODO: cancel actions when collection does not exist
    # Checks if the collection exists on the database
    # @param collection: database collection
    def collectionExists(self, collection):
        collist = self.database.list_collection_names()
        if collection in collist:
            print("Collection exist")
        else:
            print("Collection does not exist")

    # Creates a new item in the collection
    # @param collection: database collection
    # @param query: query in JSON-format
    def create(self, collection, query):
        self.collectionExists(collection)

        try:
            return self.database[collection].insert_one(query)
        except Exception as n:
            print('Cannot add this one: ' + str(n))

    # Find an existing item in the collection
    # @param collection: database collection
    # @param key: key that should be found
    # @param value: value that should be looked for
    def find(self, collection, key, value):
        self.collectionExists(collection)

        try:
            return self.database[collection].find_one({key: value})
        except Exception as n:
            print('Cannot find this one' + str(n))

    # Updates (edits) an existing item in the collection
    # @param collection: database collection
    # @param query: old query in JSON-format
    # @param key: new or existing key we should add or edit
    # @param newValue: new value that should be set to the key
    def update(self, collection, query, key, newValue):
        self.collectionExists(collection)

        newQuery = {"$set": {key: newValue}}

        try:
            return self.database[collection].update_one(query, newQuery)
        except Exception as n:
            print('Cannot update this one' + str(n))

    # Deletes an existing item in the collection
    # @param collection: database collection
    # @param query: query in JSON-format
    def delete(self, collection, query):
        self.collectionExists(collection)

        try:
            return self.database[collection].delete_one(query)
        except Exception as n:
            print('Cannot delete this one' + str(n))