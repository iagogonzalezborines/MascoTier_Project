# Classes PHP elefanto

### Class User

The base class `User` might include common user information such as the user ID, username, email, and password.

**Attributes:**
- `userId: int`
- `username: string`
- `email: string`
- `password: string`

**Methods:**
- `__construct(username: string, email: string, password: string): void`
- `getUserId(): int`
- `getUsername(): string`
- `getEmail(): string`
- `setPassword(password: string): void`
- `transformEmailToUsername(): void`

### Class Owner (inherits from User)

The `Owner` class extends the `User` class and could contain owner-specific information such as contact details and the list of owned pets.

**Additional Attributes:**

- `pets: array[Pet]`

**Additional Methods:**
- `__construct(username: string, email: string, password: string, contactNumber: string): void`

- `addPet(pet: Pet): void`
- `getPets(): array[Pet]`

### Class Carer (inherits from User)

The `Carer` class extends the `User` class and represents a user offering pet care services.

**Additional Attributes:**
- `idDocument: string`
- `place: bool`
- `rating: int`
- `contactNumber: string`

**Additional Methods:**
- `__construct(username: string, email: string, password: string, idDocument: string, place: bool, rating: int): void`
- `getIdDocument(): string`
- `getContactNumber(): string`
- `hasPlace(): bool`
- `getRating(): int`

### Class Request

The `Request` class might represent a service request with details like the date, associated pet, and carer, along with the status.

**Attributes:**
- `date: string`
- `status: string` (pending, accepted, denied, in process, paid/finished)
- `pet: Pet`
- `carer: Carer`

**Methods:**
- `__construct(date: string, status: string, pet: Pet, carer: Carer): void`
- `getDate(): string`
- `getStatus(): string`
- `getPet(): Pet`
- `getCarer(): Carer`

### Class Pet

The `Pet` class could represent a pet with details like the pet ID, name, species, and additional information.

**Attributes:**
- `petId: int`
- `name: string`
- `species: string`
- `additionalInfo: string`

**Methods:**
- `__construct(name: string, species: string, additionalInfo: string): void`
- `getPetId(): int`
- `getName(): string`
- `getSpecies(): string`
- `getAdditionalInfo(): string`



+-----------------------+          +------------------+
|         User          |          |      Owner       |
+-----------------------+          +------------------+
| - userId: int         |          | - contactNumber: string
| - username: string    |          | - pets: array[Pet]
| - email: string       |          +------------------+
| - password: string    |          | +__construct(username, email, password, contactNumber)
| +__construct(...)     |          | +getContactNumber(): string
| +getUserId(): int     |          | +addPet(pet: Pet): void
| +getUsername(): string|          | +getPets(): array[Pet]
| +getEmail(): string   |          +------------------+
| +setPassword(...)     |
| +transformEmailToUsername()|
+-----------------------+

+-----------------------+           +----------------------+
|        Carer          |---(1,n)--|       Request        |
+-----------------------+           +----------------------+
| - idDocument: string  |           | - date: string       |
| - place: bool         |           | - status: string     |
| - rating: int         |           | - pet: Pet           |
+-----------------------+           | - carer: Carer       |
| +__construct(...)     |           | +__construct(...)    |
| +getIdDocument(): string           | +getDate(): string   |
| +hasPlace(): bool                   | +getStatus(): string |
| +getRating(): int                   | +getPet(): Pet       |
+-----------------------+           | +getCarer(): Carer   |
                                    +----------------------+

+-----------------------+
|         Pet           |
+-----------------------+
| - petId: int          |
| - name: string        |
| - species: string     |
| - additionalInfo: string |
+-----------------------+
| +__construct(...)     |
| +getPetId(): int      |
| +getName(): string    |
| +getSpecies(): string |
| +getAdditionalInfo(): string |
+-----------------------+


In this textual representation:

    Public methods are represented by +.
    Private attributes are represented by -.
    Constructor methods are represented by +__construct(...).
    Relationships are indicated by lines connecting the classes.

