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
- `contactNumber: string`
- `pets: array[Pet]`

**Additional Methods:**
- `__construct(username: string, email: string, password: string, contactNumber: string): void`
- `getContactNumber(): string`
- `addPet(pet: Pet): void`
- `getPets(): array[Pet]`

### Class Carer (inherits from User)

The `Carer` class extends the `User` class and represents a user offering pet care services.

**Additional Attributes:**
- `idDocument: string`
- `place: bool`
- `rating: int`

**Additional Methods:**
- `__construct(username: string, email: string, password: string, idDocument: string, place: bool, rating: int): void`
- `getIdDocument(): string`
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
